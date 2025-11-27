<?php


$table = 'post';

$title = "";
$content = "";
$id = "";
$featured = "";
$additional = "";

if(isset($_GET['id'])) {
    $updatepost = selectOne($table, ['id' => $_GET['id']]);
    
    $id = $updatepost['id'];
    $title = $updatepost['title'];
    $content = $updatepost['content'];
    $featured = $updatepost['attach_path'];
    $additional = $updatepost['additional_img'];
}

//МЭдээ үүсгэх
if (isset($_POST['publish-btn'])) {
    unset($_POST['publish-btn']);
    
    $feat_img_name = time() . '_' . $_FILES['attach_path']['name'];
    $feat_img_dest = "../include/post_images/" . $feat_img_name;

    $feat_result = move_uploaded_file($_FILES['attach_path']['tmp_name'], $feat_img_dest);
    if($feat_result){
        $_POST['attach_path'] = $feat_img_name;
    } else {
        $errors = 'Failed to upload';
    }

    $total_count = count($_FILES['additional_img']['name']);
    $add_names = '';
    for($i = 0; $i < $total_count; $i++) {
        $add_img_name = time() . '_' . $_FILES['additional_img']['name'][$i];
        $add_img_dest = "../include/post_images/" . $add_img_name;
        $add_result = move_uploaded_file($_FILES['additional_img']['tmp_name'][$i], $add_img_dest);
        
        if($i === 0){
            $add_names .= $add_img_name;
        } else {
            $add_names .= ", " . $add_img_name;
        }  
    }
    

    
    $_POST['additional_img'] = $add_names;
    
    // $_POST['content'] = htmlentities($_POST['content']);
    $post_id = create($table, $_POST); 
    // display($add_names);
    header("location: news-admin");
}

if (isset($_GET['delete_id'])) 
    {
    $id = $_GET['delete_id'];
    delete("post", $id);
    header('Location: news-admin.php');
}

if (!empty($_POST['update-btn'])) {
    $id = (int)$_POST['id'];
    $data = $_POST;
    unset($data['update-btn'], $data['id']);



    // Update query үүсгэх
    $set = implode(', ', array_map(fn($k) => "$k = ?", array_keys($data)));
    $types = str_repeat('s', count($data)) . 'i';
    $values = array_values($data);
    $values[] = $id;

    $stmt = $conn->prepare("UPDATE post SET $set WHERE id = ?");
    $stmt->bind_param($types, ...$values);
    $stmt->execute();

    header('Location: news-admin.php');
    exit;

    
}
    
    $_POST['additional_img'] = $add_names;
    
    // $_POST['content'] = htmlentities($_POST['content']);
    $post_id = create($table, $_POST); 
    // display($add_names);
    header("location: news-admin");