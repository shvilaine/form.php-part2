<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  foreach ($_POST as $key => $value) {
    $contact[$key] = trim($value);
  }

  $mistakes = [];

  if (empty($contact['name'])) {
    $mistakes[] = 'Hmm. Le nom est obligatoire.';
  }
  if (empty($contact['email'])) {
    $mistakes[] = 'Hmm. L\'adresse mail est obligatoire.';
  }
  if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $mistakes[] = 'Hmm. Si tu donnes un email, mets-le au bon format.';
  }
  if (empty($contact['phone'])) {
    $mistakes[] = 'Hmm. La région est obligatoire.';
  }
  if (empty($contact['object'])) {
    $mistakes[] = 'Hmm. L\'objet est obligatoire.';
  }
  if (empty($contact['message'])) {
    $mistakes[] = 'Hmm. Le message est obligatoire.';
  }
  if (empty($mistakes)) {
    header('Location: form.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='style.css'>
  <title>Formulaire de contact</title>
</head>

<?php
if (isset($mistakes) && ($mistakes > 0)) { ?>
  <div class="error">
    <ul>
      <?php foreach ($mistakes as $mistake) { ?>
        <li><?php echo $wrongInput; ?></li>
      <?php }; ?>
    </ul>
  <?php }; ?>
  </div>

  <body>
    <form action="" method="POST">
      <h1>Contacte-moi</h1>
      <div>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required="">
      </div>
      <div>
        <label for="phone">Téléphone:</label>
        <input type="text" id="phone" name="phone" required="">
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required="">
      </div>
      <div>
        <label for="object"><Object>Objet</Object></label>
        <select id="object" name="object" required="">
          <option value="info">Demande d'information</option>
          <option value="job">Deviens ma babysitter</option>
          <option value="mommy">Es-tu ma maman?</option>
          <option value="other">Autres</option>
        </select>
      </div>
      <div>
        <label for="message">Message :</label>
        <textarea id="message" name="message" required=""></textarea>
      </div>
      <button>Envoyer</button>
    </form>
  </body>

</html>