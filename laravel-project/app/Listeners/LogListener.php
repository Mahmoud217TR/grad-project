<?php

namespace App\Listeners;

use App\Events\DeletionEvent;
use App\Events\GeneralLogEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Events\RoleChangeEvent;
use App\Events\UserRelatedEvent;
use App\Models\Code;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Log;
use App\Models\Post;
use App\Models\Sheet;
use App\Models\Snippet;
use App\Models\Tag;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogListener implements ShouldQueue
{
    
    private function createLog($title,$data,$type){
        Log::create([
            'title' => $title,
            'data' => $data,
            'type' => Log::getTypeValue($type),
        ]);
    }

    protected $actions = [
        'insertion' => "was Inserted into Database",
        'modification' => "was Modified in Database",
        'deletion' => "was Deleted from Database",
    ];

    private function message($type,$object,$action){
        if($type == 'Code'){
            $code = $object;
            return "The Code \"".$code->title."\" with the ID:".$code->id." ".$this->actions[$action].".\n".
                   "In State of: \"".$code->status."\".\n";
        }else if($type == 'Language'){
            $language = $object;
            return "The Language \"".$language->name."\" with the ID:".$language->id." ".$this->actions[$action].".\n".
                   "In State of: \"".$language->status."\".\n";
        }else if($type == 'Snippet'){
            $snippet = $object;
            $language = Language::find($snippet->language_id);
            $code = Code::find($snippet->code_id);
            return "The Snippet \"".$snippet->name."\" with the ID:".$snippet->id." ".$this->actions[$action].".\n".
                   "In State of: \"".$snippet->status."\".\n".
                   "Belongs to the Language \"".$language->name."\" (".$language->id.").\n".
                   "Belongs to the Code \"".$code->name."\" (".$code->id.").\n";  
        }else if($type == 'Post'){
            $post = $object;
            return "The Post \"".$post->title."\" with the ID:".$post->id." ".$this->actions[$action].".\n".
                   "In State of: \"".$post->status."\".\n";
        }else if($type == 'Comment'){
            $comment = $object;
            $post = Post::find($comment->post_id);
            return "The Comment \"".$comment->content."\" with the ID:".$comment->id." ".$this->actions[$action].".\n".
                   "In State of: \"".$post->status."\".\n".
                   "Belongs to the Post \"".$post->title."\" (".$post->id.").\n";
        }else if($type == 'Tag'){
            $tag = $object;
            return "The Tag \"".$tag->name."\" with the ID:".$tag->id." ".$this->actions[$action].".\n";
        }else if($type == 'Sheet'){
            $sheet = $object;
            return "The Sheet \"".$sheet->title."\" with the ID:".$sheet->id." ".$this->actions[$action].".\n".
                    "In State of: \"".$sheet->status."\".\n";
        }else{
            return 'Undifiend Model Type!!';
        }
    }
    public function general(GeneralLogEvent $event)
    {
        $this->createLog($event->title, "".$event->data."\n".$event->datetime, "general");
    }

    public function roleChange(RoleChangeEvent $event)
    {
        $title = "User ".$event->user->name." with id (".$event->user->id.") now has the role of (".$event->user->role.").";
        $data = "The Super Admin".$event->super_admin->name."with id (".$event->super_admin->id.") made User ".$event->user->name." with id (".$event->user->id.") in role (".$event->user->role.").\n".$event->datetime;
        $type = "role change";
        $this->createLog($title, $data, $type);
    }

    public function insertion(InsertionEvent $event)
    {
        $type = "insertion";
        $title = "Inserted an Object of ".$event->object_type." type with ID:".$event->object->id.".";
        $data = "".$this->message($event->object_type,$event->object,$type).
                "By ".$event->user->name." (".$event->user->id.") Role: ".$event->user->role.".\n".
                "@".$event->datetime."\n";
        $this->createLog($title, $data, $type);
    }

    public function modification(ModificationEvent $event)
    {
        $type = "modification";
        $title = "Modified an Object of ".$event->object_type." type with ID:".$event->object->id.".";
        $data = "".$this->message($event->object_type,$event->object,$type).
                "By ".$event->user->name." (".$event->user->id.") Role: ".$event->user->role.".\n".
                "@".$event->datetime."\n";
        $this->createLog($title, $data, $type);
    }

    public function deletion(DeletionEvent $event)
    {
        $type = "deletion";
        $title = "Deleted an Object of ".$event->object_type." type with ID:".$event->object->id.".";
        $data = "".$this->message($event->object_type,$event->object,$type).
                "By ".$event->user->name." (".$event->user->id.") Role: ".$event->user->role.".\n".
                "@".$event->datetime."\n";
        $this->createLog($title, $data, $type);
    }

    public function userRelated(UserRelatedEvent $event)
    {
        $type = "user related";
        $this->createLog($event->title, "".$event->data."\n".$event->datetime,  "user related");
    }
}
