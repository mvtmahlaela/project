<?php include('header.php'); ?>
<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <div id="page">
            <div id="sidebar">
                <a href="index.php" class="logo"></a>
                <ul>
                    <li>
                        <span><a href="index.php"><i class="icon-home icon-large"></i>Home</a></span>
                    </li>
                    <li>
                        <span><a href="wines.php"><i class=" icon-th-large icon-large"></i>Products</a></span>
                    </li>

                    <li>
                        <span><a href="about.php"><i class="icon-info-sign icon-large"></i>&nbsp;About US</a></span>
                    </li>

                    <li  class="selected">
                        <span><a href="contact.php"><i class="icon-phone-sign icon-large"></i>Contact US</a></span>
                    </li>
                    <li>
                        <span><a href="order.php"><i class="icon-shopping-cart icon-large"></i>Order Now</a></span>
                    </li>

                </ul>
                <?php include('sidebar.php'); ?>
                <div class="newsletter">

                </div>
            </div>
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header">
                      

                    </div>
                    <div id="body">
                        <h3>Contact Us</h3>
                        <hr>
                        <form action="">
                            <label for="name"><span>name</span>
                                <input type="text" name="name" id="name">
                            </label>
                            <label for="email2"><span>email</span>
                                <input type="text" name="email2" id="email2">
                            </label>
                            <label for="message"><span>message</span>
                                <textarea id="message" cols="30" rows="10"></textarea>
                            </label>
                            &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                            &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                            <button   class="btn btn-success" value="Submit"><i class="icon-envelope icon-large"></i>&nbsp;Submit</button>
                        </form>
                    </div>
                    <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('footer_bottom.php');
    ?>
</body>
</html>