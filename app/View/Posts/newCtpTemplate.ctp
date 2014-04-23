<!-- File: /app/View/Posts/index.ctp -->
<!-- We are creating our View and defining how our index should look like 
with a mix of PHP and HTML tags-->



<h1>Blog posts</h1>

 <!-- Here we add an 'add' link to our view-->

<p><?php echo $this->Html->link("Add Post", array('action' => 'add')); ?></p>


<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info.
          We also make use of Helpers(Html->link), which are component-like 
          classes that are added to our views, elements and layouts. -->

 <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
