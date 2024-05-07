<?php
class TambahOrdersView{
    public function render($data){
        $formElements = [
            'member_id' => 'select',
            'product' => 'text'
        ];

        $formHTML = $this->generateFormHTML($formElements, $data);

        $tpl = new Template("templates/form.html");
        $tpl->replace("DATA_FORM", $formHTML);
        $tpl->write(); 
    }

    private function generateFormHTML($elements, $data){
        $formHTML = '';

        foreach($elements as $name => $type){
            if($type === 'select'){
                $formHTML .= $this->generateSelectElement($name, $data);
            } else {
                $formHTML .= $this->generateInputElement($name, $type);
            }
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

    private function generateSelectElement($name, $data){
        $optionsHTML = "<option value=''>Pilih member</option>";

        foreach($data as $val){
            list($id, $nama) = $val;
            $optionsHTML .= "<option value='{$id}'>{$nama}</option>";
        }

        return "
            <label>". strtoupper($name) .": </label>
            <select class='form-control' id='{$name}' name='{$name}' required>
                {$optionsHTML}
            </select> <br>
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
