<?php

namespace App\Models;

use App\Models\Resident\User as ResidentUser;

class User extends ResidentUser
{
    // This class exists so code expecting `App\Models\User` can reuse
    // the resident user implementation located at `App\Models\Resident\User`.
}
