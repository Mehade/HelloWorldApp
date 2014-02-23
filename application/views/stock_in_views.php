<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
         <?php
        echo validation_errors();
        $attribute = array(
            'role' => 'form',
            'id' => 'stock_in_views'
        );
        echo form_open('stock/search_item_view', $attribute);
        ?>
        <fieldset>
            <legend>Stock In</legend>
            <input type="radio" name="radio" value="category"/>Search By Category:
            <select name="category_id">
                <option value="">---Select category</option>

                <?php
                foreach ($categoryList as $list) {

                    echo '<option value=' . $list->category_id . '> ' . $list->category_name . '</option>';
                }
                ?>

            </select><br/>
            <input type="radio" name="radio" value="item"/>
            Search By Name <input type="text" name="item_name"/><br/>
            <input type="submit" name="submit" value="Search"/>
        </fieldset>
<?php
echo form_close();
?>
        
         <table border="1">

            <thead>

            
            <th> Name</th>
            <th> Unite Price</th>
            <th> Image</th>
            <th> Category</th>
            <th>Present quantity</th>
            <th> New Quantity</th>
        </thead>
        <tbody>      
        <?php 
        $this->load->helper('html');      
        if(isset($ItemViewList)){
foreach ($ItemViewList as $aList) {
    $image_properties = array(
          'src' => 'upload/'.$aList->image,
          'alt' => 'Me, demonstrating how to eat 4 slices of pizza at one time',
          'class' => 'post_images',
          'width' => '100',
          'height' => '100',
          'title' => 'That was quite a night',
          'rel' => 'lightbox',
);


    echo '<tr>';
   
    echo '<td>' . $aList->name . '</td>';
    echo '<td>' . $aList->price . '</td>';
    echo '<td>'.img($image_properties).'</td>';
    echo '<td>' . $aList->catName . '</td>';
    echo '<td>'. $aList->qty . '</td>';
    ?>
        <td> 
            <?php
            $attribute = array(
            'role' => 'form',
            'id' => 'viewSearchItem'
        );
        echo form_open('stock/updateStock', $attribute);
            ?>
                <input type="text" name="nqty">
                <input type="hidden" name="prductId" value="<?php echo $aList->item_id; ?>">
                <input type="submit" name="submit" value="add">
            
         </form>  
         </td>
     <?php
    echo '</tr>';
}
       
        }   

?> 

        
    </body>
</html>
