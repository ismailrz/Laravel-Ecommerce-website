<?php
namespace App\Helpers;
 use App\Models\User;


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
      /**
      * validate_gravatar
      *
      * Check if the email has any gravatar image or not
      *
      * @param  string $email Email of the User
      * @return boolean true, if there is an image. false otherwise
      */
      public static function validate_gravatar($email) {
        $hash = md5($email);
        $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
        $headers = @get_headers($uri);
        if (!preg_match("|200|", $headers[0])) {
          $has_valid_avatar = FALSE;
        } else {
          $has_valid_avatar = TRUE;
        }
        return $has_valid_avatar;
      }


      /**
      * gravatar_image
      *
      *  Get the Gravatar Image From An Email address
      *
      * @param  string $email User Email
      * @param  integer $size  size of image
      * @param  string $d     type of image if not gravatar image
      * @return string        gravatar image URL
      */
      public static function gravatar_image($email, $size=0, $d="") {
        $hash = md5($email);
        $image_url = 'http://www.gravatar.com/avatar/' . $hash. '?s='.$size.'&d='.$d;
        return $image_url;
      }


 }
