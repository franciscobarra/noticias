

<h1>Add Anuncio</h1>
<?php
echo $this->Form->create('Anuncio');
echo $this->Form->input('titulo');
echo $this->Form->input('cuerpo');
echo $this->Form->input('fecha_publicacion');
echo $this->Form->input('fecha_vigencia');
echo $this->Form->input('longitud');
echo $this->Form->input('latitud');
echo $this->Form->end('Save Anuncio');
?>