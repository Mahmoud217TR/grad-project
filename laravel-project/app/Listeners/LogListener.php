<?php

namespace App\Listeners;

use App\Events\DeletionEvent;
use App\Events\GeneralLogEvent;
use App\Events\InsertionEvent;
use App\Events\ModificationEvent;
use App\Events\RoleChangeEvent;
use App\Events\UserRelatedEvent;
use App\Models\Log;
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
        $title = "Object of (".$event->object_type.") with the id (".$event->object->id.") has been inserted.";
        $data = "User ".$event->user->name." with id (".$event->user->id.") has inserted an object of (".$event->object_type.") with the id (".$event->object->id.") into the database.\n".$event->datetime;
        $type = "insertion";
        $this->createLog($title, $data, $type);
    }

    public function modification(ModificationEvent $event)
    {
        $title = "Object of (".$event->object_type.") with the id (".$event->object->id.") has been modified.";
        $data = "User ".$event->user->name." with id (".$event->user->id.") has modified an object of (".$event->object_type.") with the id (".$event->object->id.").\n".$event->datetime;
        $type = "modification";
        $this->createLog($title, $data, $type);
    }

    public function deletion(DeletionEvent $event)
    {
        $title = "Object of (".$event->object_type.") with the id (".$event->object->id.") has been deleted.";
        $data = "User ".$event->user->name." with id (".$event->user->id.") has deleted an object of (".$event->object_type.") with the id (".$event->object->id.") from the database.\n".$event->datetime;
        $type = "deletion";
        $this->createLog($title, $data, $type);
    }

    public function userRelated(UserRelatedEvent $event)
    {
        $type = "user related";
        $this->createLog($event->title, "".$event->data."\n".$event->datetime,  "user related");
    }
}
