<?php
require 'php/scrud/scrud_users.php';

// Set the number of users to display per page
$usersPerPage = 5;

// Check if a page number is specified in the URL
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $usersPerPage;

// Check if the form is submitted for role changes
if (isset($_POST['submit'])) {
    $user_ids = $_POST['user_id'];
    $user_roles = $_POST['user_role'];

    foreach ($user_ids as $key => $user_id) {
        $selected_role = $user_roles[$key];

        switch ($selected_role) {
            case 1:
                update_users(1, 'role_id', 'id', $user_id);
                break;
            case 2:
                update_users(2, 'role_id', 'id', $user_id);
                break;
            case 3:
                update_users(3, 'role_id', 'id', $user_id);
                break;
            default:
                
                break;
        }
    }
}

// Check if a search term is provided
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the base query
$baseQuery = "SELECT * FROM users";

// Conditionally add the search condition to the query
if (!empty($searchTerm)) {
    $query = "$baseQuery WHERE 
               first_name LIKE '%$searchTerm%' OR
               last_name LIKE '%$searchTerm%' OR
               id LIKE '%$searchTerm%'";
} else {
    $query = $baseQuery;
}

// Modify the query to include pagination
$query .= " LIMIT $offset, $usersPerPage";

// Execute the query
$recupUsers = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="js\script.js"></script>
    <title>Gestion utilisateur</title>
</head>
<body class="page_admin_user">
    <h2>Rechercher un utilisateur</h2>

    <form method="get" action="">
        <label for="search">Nom, Prénom, ou ID :</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Rechercher">
    </form>

    <h2>Liste des utilisateurs</h2>

    <table border="1">
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Type utilisateur</th>
            <th>Bannir</th>
        </tr>
        <?php
        while ($user = mysqli_fetch_assoc($recupUsers)) {
        ?>
            <tr>
                <td><?= $user['first_name']; ?></td>
                <td><?= $user['last_name']; ?></td>
                <td><?= $user['email']; ?></td>
                <form method="post">
                <td>
                    <input type="hidden" name="user_id[]" value="<?= $user['id']; ?>">
                    <select name="user_role[]">
                        <option value="1" <?= ($user['role_id'] == 1) ? 'selected' : ''; ?>>Utilisateur</option>
                        <option value="2" <?= ($user['role_id'] == 2) ? 'selected' : ''; ?>>Organisateur</option>
                        <option value="3" <?= ($user['role_id'] == 3) ? 'selected' : ''; ?>>Administrateur</option>
                    </select>
                    <input type="submit" name="submit" value="Changer">
                </td>
                </form>
                <td>
                    <a href="#" onclick="confirmerBannissement(<?= $user['id']; ?>, '<?= $user['first_name']; ?>', '<?= $user['last_name']; ?>');">
                    <img src="media\image\trash.png" width="30" alt="Bannir">
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="pagination">
   
    <?php
    // Display pagination links

    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $totalUsers = $conn->query('SELECT COUNT(*) FROM users')->fetch_assoc();
    $totalUsers = array_values($totalUsers)[0];
    $totalPages = ceil($totalUsers / $usersPerPage);

    if ($totalPages > 1) {
        echo '<p>Page : ';
        for ($i = 1; $i <= $totalPages; $i++) {
            $class = ($i === $currentPage) ? 'active' : ''; 
            echo '<a href="?page=' . $i . '" class="' . $class . '">' . $i . '</a> ';
        }
        echo '</p>';
    }
    ?>

</div>

</body>
</html>
