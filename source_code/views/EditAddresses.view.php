<?php
class EditAddressesView{
    public function render($data){
        $formElements = [
            'member_id' => 'number',
            'kelurahan' => 'text',
            'kecamatan' => 'text',
            'kabupaten' => 'text'
        ];

        $formHTML = $this->generateFormHTML($formElements, $data);

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $formHTML);
        $tpl->write(); 
    }

    private function generateFormHTML($elements, $data){
        $formHTML = '';

        foreach($elements as $name => $type){
            $formHTML .= $this->generateInputElement($name, $type, $data['address'][$name]);
        }

        $formHTML .= $this->generateButtons();

        return $formHTML;
    }

    private function generateInputElement($name, $type, $value){
        return "
            <label> ". strtoupper($name) .": </label>
            <input type='{$type}' name='{$name}' value='{$value}' class='form-control'> <br>
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
