<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;

class ImportContacts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function  __construct(int $event_id)
    {
        $this->event_id = $event_id;
    }


    public function model(array $row)

    {
        

      
        return new Contact([
            'name'     => @$row[0],
            'email'    => @$row[1], 
            'eventId'   => $this->event_id,

            
        ]);
    }
}
