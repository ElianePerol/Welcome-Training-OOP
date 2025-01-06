<?php

class Redirect {
    private $url;

    public function __construct($url) {
        $this->url = $url;
        $this->redirectToUrl();
    }

    private function redirectToUrl() {
        if (!empty($this->url)) {
            header("Location: " . $this->url);
            exit;
        } else {
            echo "Invalid URL";
        }
    }
}
?>
