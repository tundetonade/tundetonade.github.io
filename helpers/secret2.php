<?php
class Secret {
    public function id($id) {
        $number = (int) preg_replace('/[^0-9]/', '', $id);

        // Check if the number is greater than 0
        if ($number <= 0) {
            echo "Oooops! You are on a wrong URL";
            die();
        }

        return $number;
    }
}

$secret=new Secret();

?>