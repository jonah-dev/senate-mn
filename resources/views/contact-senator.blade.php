<?php if (isset($errors) && count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (session()->has('message')): ?>
    <div class="alert alert-success">
        <?= session('message') ?>
    </div>
<?php endif; ?>

<form method="post" action="/contact-senator">
    @csrf
    <fieldset>
        <legend>Contact Your Senator</legend>
        <label for="senator_id">
            Select a Senator:
            <select name="senator_id">
                <?php foreach ($senators as $senator): ?>
                    <option value="<?= $senator->senator_id ?>"><?= $senator->first_name ?> <?= $senator->last_name ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label for="sender_last_name">Last Name:</label>
        <input type="text" name="sender_last_name" placeholder="Last Name">

        <label for="sender_email">Email:</label>
        <input type="email" name="sender_email" placeholder="Email">

        <label for="message">Message:</label>
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit">Send</button>
    </fieldset>
</form>

<style>
    fieldset {
        width: 30%;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    input, textarea {
        width: 100%;
        padding: 5px;
    }

    button {
        padding: 5px 10px;
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        margin-top: 10px;
    }

    button:hover {
        background-color: #555;
    }
</style>