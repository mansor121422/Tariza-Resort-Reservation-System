<?php
session_start();
include 'connect.php'; // Ensure this file correctly connects to the database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            padding: 20px;
        }
        .form-section {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">📚 Librarian</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Request Mail</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container dashboard-container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-section">
                    <h4>Manage Books</h4>
                    <form action="manage_books.php" method="post">
                        <div class="mb-2">
                            <input type="text" class="form-control" name="book_id" placeholder="Enter Book ID">
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="title" placeholder="Enter Title">
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="author" placeholder="Enter Author">
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="genre" placeholder="Enter Genre">
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="year" placeholder="Enter Publish Year">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="action" value="add" id="add">
                            <label class="form-check-label" for="add">Add</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="action" value="delete" id="delete">
                            <label class="form-check-label" for="delete">Delete</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        <button type="reset" class="btn btn-secondary mt-2">Reset</button>
                    </form>
                </div>
            </div>
            
            <div class="col-md-8">
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Publish Year</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM books";
                        $result = $conn->query($query);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['book_id']}</td>
                                    <td>{$row['title']}</td>
                                    <td>{$row['author']}</td>
                                    <td>{$row['genre']}</td>
                                    <td>{$row['year']}</td>
                                    <td>Available</td>
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
