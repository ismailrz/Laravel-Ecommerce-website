<?php
namespace App\Helpers;
 use App\Models\User;

 use App\Helpers\GravatarHelpe;

 /**
  * Gravatar Image class
  */
 class ImageHelper
 {

    public static function getUserImage($id)
    {


      $user = User::find($id);
      $avater_url = "";
      if (!is_null($user)) {
        if ($user->avater == NULL) {
          // return him gravater image
          if (GravatarHelper::validate_gravatar($user->email)) {
            // code...
            $avater_url = GravatarHelper::gravatar_image($user->email, 100 );
          }else {
            // when there is no gravater image
            $avater_url = url('Images/Defaults/user.png');
          }
        }
      }else {
          $avater_url = url('Images/Users/'.$user->avater);
      }

      return $avater_url;
    }

 }
