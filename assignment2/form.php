<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>

<body>
 
  <form method="post" action="insert.php">
    Nama :
    <input type="text" name="name" size="40" required>
    <br>
    Email :
    <input type="text" name="email" size="25" required>
    <br>
    How did you find me?
    <select name="find_me" required>
        <option selected>From a friend</option>
        <option>I googled you</option>
        <option>Just surf on in</option>
        <option>From your Facebook</option>
        <option>I clicked an ads</option>
    </select>
    <br>
    I like your :<br>
    <input type="checkbox" id="like_page" name="like_page" value="like_page" checked>
    <label for="like_page">Front page</label><br>

    <input type="checkbox" id="like_form" name="like_form" value="like_form">
    <label for="like_form">Form</label><br>

    <input type="checkbox" id="like_ui" name="like_ui" value="like_ui">
    <label for="like_ui">User interface</label><br>
    
    Comments :<br>
    <textarea name="comment" cols="30" rows="8" required></textarea>
    <br>
    <input type="submit" name="add_form" value="Add a New Comment">
    <input type="reset">
    <br>
  </form>
  
</body>
</html>