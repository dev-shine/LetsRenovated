<?php namespace Zofe\Rapyd\DataForm\Field;

use Illuminate\Html\FormFacade as Form;

class Label extends Field
{
  public $type = "label";

  public function build()
  {
    $output = "";

    if (parent::build() === false) return;

    switch ($this->status) {
      case "disabled":
      case "show":
      case "create":
      case "modify":
      case "hidden":
      
        $output = "<div class='help-block'>".$this->value."&nbsp;</div>";
        break;

      default:;
    }
    $this->output = "\n".$output."\n". $this->extra_output."\n";
  }

}
