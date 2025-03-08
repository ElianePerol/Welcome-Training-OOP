<?php
include_once "user.php";
include_once "navigation.php";


class RenderHeader {
    private $user;
    private $navigation;

    public function __construct(User $user, Navigation $navigation) {
        $this->user = $user;
        $this->navigation = $navigation;
    }

    public function getUserName() {
        return $this->user->getFullName();
    }

    public function getRoleInfo() {
        return $this->user->getRoleInfo();
    }

    public function getNavigationLinks() {
        $role = $this->user->getRole();
        return $this->navigation->getLinks($role);
    }
}    


?>