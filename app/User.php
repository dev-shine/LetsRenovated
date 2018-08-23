<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name','middle_name', 'last_name' , 'email', 'password','address',
		'city_state','province','postal_code','phone_1','phone_2','answer_1','answer_2','question_1','question_2'
		];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public static function getSecurityQuestions()
	{
		return array(
			'' =>'Select Question',
			'1' =>'What was your childhood nickname?',
			'2' =>'In what city did you meet your spouse/significant other?',
			'3' =>'What is the name of your favorite childhood friend?',
			'4' =>'What is your oldest sibling\'s birthday month and year?',
			'5' =>'What is the middle name of your oldest child?',
			'6' =>'What school did you attend for sixth grade?',
			'7' =>'What is your pet\'s name?',
			'8' =>'In what year was your father born?'
		);
	}

	public function vehicles()
    {
        return $this->hasMany('App\vehicles', 'user_id');
    }


    public function routes()
    {
        return $this->hasMany('App\Route_marks', 'user_id');
    }

    public function events()
    {
        return $this->hasMany('App\Event', 'user_id');
    }

    public function insurance()
    {
        return $this->hasOne('App\Insurance');
    }

    /*
    public function setPasswordAttribute($password)
    {
    	$this->attributes['password'] = $password;
    }
    */
}
