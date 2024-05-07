<?php
class TambahMembersView{
    public function render($data){
        $formElements = [
            'name' => 'text',
            'email' => 'text',
            'phone' => 'text',
        ];

        $formHTML = $this->generateFormHTML($formElements, $data);

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $formHTML);
        $tpl->write(); 
    }

    private function generateFormHTML($elements, $data){
        $formHTML = '';

        foreach($elements as $name => $type){
            $formHTML .= $this->generateInputElement($name, $type);
        }

        $formHTML .= $this->generateButtons();

        return $formHTML;
    }

    private function generateInputElement($name, $type){
        return "
            <label> ". strtoupper($name) .": </label>
            <input type='{$type}' name='{$name}' class='form-control'> <br>
        ";
    }

    private function generateButtons(){
        return "
            <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
            <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>
        ";
    }
}
?>
