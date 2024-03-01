
<?php
class FormCreator {

    private $form;

    public function __construct($action = '', $method = 'post') {
        $this->form = '<div class="d-flex justify-content-center"><form class="d-flex flex-column" action="' . $action . '" method="' . $method . '">';
    }

    public function input($type, $name, $value = '') {
        $this->form .= '<input type="' . $type . '" name="' . $name . '" value="' . $value . '">';
    }

    public function label($for, $text) {
        $this->form .= '<label for="' . $for . '">' . $text . '</label>';
    }

    public function endForm() {
        $this->form .= '</form></div>';
        return $this->form;
    }
}