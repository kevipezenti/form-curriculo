<?php $this->layout('layouts/site', ['title' => 'Formulário Curriculo']); ?>

<form action="<?= url('/'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com" required>
    </div>
    <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="tel" class="form-control" name="phone" id="phone" placeholder="(99) 9999-9999" required>
    </div>
    <div class="form-group">
        <label for="office">Cargo Desejado</label>
        <input type="text" class="form-control" name="office" id="office" placeholder="" required>
    </div>
    <div class="form-group">
        <label for="schooling">Escolaridade</label>
        <select class="form-control" name="schooling" id="schooling" required>
                <?php
                foreach (SCHOOLINGS as $value) :
                    ?>
                <option value="<?= $value; ?>"><?= $value; ?></option>
                    <?php
                endforeach;
                ?>
        </select>
    </div>
    <div class="form-group">
        <label for="file">Currículo</label>
        <input type="file" class="form-control-file" name="file" id="file"
            placeholder=".doc, .docx, .pdf"
            accept="application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
            required>
    </div>
    <div class="form-group">
        <label for="note">Observação</label>
        <textarea class="form-control" name="note" id="note" rows="3"></textarea>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="form-group">
                <label for="date">Data</label>
                <input type="date" class="form-control" name="date" id="date" value="<?= date('Y-m-d'); ?>" required>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label for="hour">Hora</label>
                <input type="time" class="form-control" name="hour" id="hour" value="<?= date('H:i'); ?>" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
