<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style/styles.css">
    <title>Book preview</title>
</head>
<body id="bookpreview">
  <div class="top-bar">
    <div class="top-nav">
      <a href="index.html"><h3 class="brand"><span>B</span>rain<span>F</span>ood</h3></a>
      <ul class="top-nav-list">
        <li class="top-nav-listItem Home"><a href="index.html">Home</a></li>
        <li class="top-nav-listItem catalogue"><a href="catalogue.html">Catalogue</a></li>
        <li class="top-nav-listItem login"><a href="login.html">Login</a></li>
        <li class="top-nav-listItem register"><a href="registration.html">Register</a></li>
        <li class="top-nav-listItem cart">
          <div class="cart-item-indicator">
            <p>12</p>
          </div>
          <a href="cart.html">Cart</a>
        </li>
      </ul>
      <form class="search-brainfood">
        <input type="text" class="text-field" placeholder="Search all books">
      </form>
    </div>
  </div>
  <div class="main">
    <p class="global-error">You have not chosen any amount!</p>
    <div class="book-display">
      <div class="display-book"></div>
      <div class="info">
        <h2 class="book-title">Javascript &amp; Jquery </h2>
        <h3 class="book-author">by Jon Duckett</h3>
        <h3 class="book-price">$90</h3>
        <form>
          <label for="book-amout">Amount</label>
          <input type="number" class="book-amount text-field">
          <input class="def-button add-to-cart" type="submit" name="" value="Add to cart">
        </form>
      </div>
    </div>
    <div class="book-reviews">
      <h3 class="header">Reviews</h3>
      <ul class="review-list">
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">jm</h4>
          </div>
          <div class="info">
            <h4 class="username">Jon Williams</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">AE</h4>
          </div>
          <div class="info">
            <h4 class="username">Abby Essien</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">SB</h4>
          </div>
          <div class="info">
            <h4 class="username">Sandra Bullock</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
      </ul>
      <div class="add-comment">
        <h3 class="header">Add your comment</h3>
        <form class="comment">
          <textarea class="text-field" placeholder="write something"></textarea>
          <button class="def-button post-comment">Upload comment</button>
        </form>
      </div>
    </div>
  </div>
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
