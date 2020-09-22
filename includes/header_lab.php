<header>
    		<div class="container">
    			<div class="header_inner">
    				<div class="header_name">
                   	 	<?php echo $config['title'];?>
                   	 </div>
                   <nav>          
                   	 <a class="nav_link" href="/">Главная</a>
                   	 <a class="nav_link" href="/pages/feedback.php">Обратная связь</a>   
                     <?php if (isset($_SESSION['logged_user']) ) : ?>
                      <a class="nav_link" href="#">Вход выполнен: <?php echo $_SESSION['logged_user']->login ; ?></a>
                      <a class="nav_link" href="../registration/logout.php">Выйти</a>
                     <?php else : ?>                      
                     <a class="nav_link" href="../registration/login.php">Авторизация</a><a class="nav_link" href="./signup.php">Регистрация</a>
                   <?php endif; ?>
                   </nav>

    			</div>   		
    		</div>

    		<div class="header_bottom">
    			  <div class ="container">
    			  <nav>
    			  	
    		       <a class="nav_bottom_link" href="/pages/laboratornaya.php"><?php echo '' ?></a>
               <a class="nav_bottom_link" href="../word_php.php"><?php echo 'Скачать эту работу' ?></a>
                   
    		        		        
    		      </nav>
    		      </div>
    			</div>
    	</header>
