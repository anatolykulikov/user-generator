<?php
class User {
    public $user_pass = '';
    public $user_login = '';
    public $first_name = '';
    public $last_name = '';
    public $description = '';

    public function __construct() {

        // Generate user password
        $this->user_pass = wp_generate_password(12);

        // Create user first and last names
        $gender = $this->set_gender();
        switch($gender) {
            case 'man': {
                $this->first_name = get_man_name();
                $this->last_name = get_surname() . __('man-declension-surname', 'usergenerator');
            }
            case 'woman': {
                $this->first_name = get_woman_name();
                $this->last_name = get_surname() . __('woman-declension-surname', 'usergenerator');
            }
        }

        // Generate user login
        $this->generate_login();
        $this->generate_email();
    }

    // Set gender for current user
    private function set_gender() {
        $genders = ['woman', 'man'];
        return $genders[rand(0, 1)];
    }

    // Generate user_login
    private function generate_login(int $num = 0) {
        $login = ($num === 0) ? 'generated_user' : 'generated_user' .'_'. $num ;

        require_once ABSPATH . WPINC . '/user.php';
        if(username_exists($login)) {
            return $this->generate_login(++$num);
        }

        return $this->user_login = $login;
    }

    // Generate user_login
    private function generate_email() {
        return $this->user_email = $this->user_login .'@'. $_SERVER['HTTP_HOST'] .'.wordpress';
    }
}