<?php

  ob_start();
  session_start();

  $page_title = "Home: Index";

  include 'includes/database.php';

  include 'includes/header.php';

  include 'includes/nav.php';

?>

      <form class="search-brainfood">
        <input type="text" class="text-field" placeholder="Search all books">
      </form>
    </div>
  </div>
  <!-- main content starts here -->
  <div class="main">
    <div class="book-display">
      <div class="display-book"></div>  
      <style="background: url('../img/big.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;"></style>
      <div class="info">
        <h2 class="book-title">Eloquent Javascript</h2>
        <h3 class="book-author">by Marijn Haverbeke</h3>
        <h3 class="book-price">$200</h3>

        <form>
          <label for="book-amout">Amount</label>
          <input type="number" class="book-amount text-field">
          <input class="def-button add-to-cart" type="submit" name="" value="Add to cart">
        </form>
      </div>
    </div>
    <div class="trending-books horizontal-book-list">
      <h3 class="header">Trending</h3>
      <ul class="book-list">
        <li class="book">
          <a href="bookpreview.php"><div class="book-cover"></div></a>
          <div class="book-price"><p>$125</p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php"><div class="book-cover"></div></a>
          <div class="book-price"><p>$90</p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php"><div class="book-cover"></div></a>
          <div class="book-price"><p>$250</p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php"><div class="book-cover"></div></a>
          <div class="book-price"><p>$50</p></div>
        </li>
      </ul>
    </div>
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Recently Viewed</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
        <li class="book">
          <a href="bookpreview.php"><div class="book-cover"></div></a>
          <div class="book-price"><p>$250</p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php"><div class="book-cover"></div></a>
          <div class="book-price"><p>$50</p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php"><div class="book-cover"></div></a>
          <div class="book-price"><p>$125</p></div>
        </li>
        <li class="book">
          <a href="bookpreview.php"><div class="book-cover"></div></a>
          <div class="book-price"><p>$90</p></div>
        </li>
      </ul>
    </div>

  </div>

  <?php 

    #include footer
    include 'includes/footer.php';

  ?>