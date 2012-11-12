<?php
$this->load->view('templates/public_header.php');
?>
<body>
<div id="page_wrapper">
	<header id="header">
	    <?php 
	    	$this->load->view($header_tpl);
	    ?>
    </header>
    
    <nav id="primary_wrapper">
	    <?php 
	    	$this->load->view($primary_tpl);
	    ?>
    </nav>
    
    <section id="content_wrapper">
		<?php
			$this->load->view($content_tpl);
		?>
    </section>
    
    <aside id="secondary_wrapper">
	    <?php 
	       $this->load->view($secondary_tpl);
	    ?>
    </aside>
    
    <footer id="footer_wrapper">
		<?php 
			$this->load->view($footer_tpl);
		?>
    </footer>
</div>
<body>