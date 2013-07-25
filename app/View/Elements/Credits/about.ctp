<div>
<h2>Credits</h2>
<a name="about" ></a>
<h3>About</h3>
<ul>
	<li>
		DigikamWebUi is a simple web viewer for <a href="http://www.digikam.org/" >Digikam</a>
	</li>
	<li>
	It is based on the <a href="http://cakephp.org/" >CakePHP</a> framework and uses the powerful <a href="http://jquery.com/">JQuery</a> javascript framework.
	</li>
	<li>
		It is at least compatible with the <b>3.1.0 Digikam database but should also be compatible with severals others version</b> because the database scheme is quite stable.
	</li>
	<li>
		It can use an SQLite, an MySQL database or any other database supported by CakePHP
	</li>
</ul>
<a name="features" ></a>
<h3>Features</h3>
<ul>
		<li>A 4 step installation
			<ul>
				<li>Upload the project folder on your server hosting the Digikam database</li>
				<li>Configure the application as it can find the Digikam database</li>
				<li>Set up an additional small database for users management</li>
				<li>Create the root user and add your friends and family</li>
			</ul>
		</li>
		<li>Miniature generation and caching</li>
<li>
	Users
	<ul>
		<li>
			An user can
			<ul>
				<li>Access to its available albums, except pictures tagged with some forbidden tags</li>
				<li>Access to its available tagged pictures, except pictures belonging to certains forbidden albums</li>
				<li>Rate pictures</li>
			</ul>
		</li>
		<li>
			The administrator can
			<ul>
				<li>Add and accept new users</li>
				<li>manage its users by adding them some availables/forbidden Tags/Albums thanks to a drag'n drop interface</li>
				<li>View, Tag, Untag, Rate, Download all pictures</li>
			</ul>
		</li>
	</ul>
	
</li>
		<li>TODO
			<ul>
				<li>A better design!!</li>
				<li>Allow users to add some selected tags to images</li>
				<li>a "Download album" link</li>
			</ul>
		</li>
</ul>
<a name="installation" ></a>
<h3>Installation</h3>
	<ul>
		<li>System requirements
			<ul>
				<li>a working web server (ie <a href="http://www.apache.org/" >Apache</a>)</li>
				<li>a Digikam database</li>
				<li>with all needed pictures</li>
			</ul>
		</li>
		<li>a little bit of configuration
			<ul>
				<li>If you are using a SQLite database, please update the database path in the <a href="file://<?php echo APP ?>Config/Database.php"><?php echo APP ?>Config/Database.php</a> (variable <b>$default</b>), for other database configuration, please refer to the <a href="http://book.cakephp.org/2.0/en/development/configuration.html" >cakephp documentation</a><br/>
				Note : if you want to update images setting such as ratting, tags..., <b>please make the Digikam database file writtable</b>.
				</li>
				<li>Then, please set up an other database for DigikamWebUi itself for users management (variable <b>$digikamWebUi</b>). This database has to have the scheme described in the <a href="file://<?php echo APP ?>Model/Datasource/digikamWebUi.sql" ><?php echo APP ?>Model/Datasource/digikamWebUi.sql</a> (SQLite version)</li>
				<li>When both databases are available, please register a new user <br/>
				<strong>Warning : the first created user will be the only administrator</strong></li>
				<li>You are ready to add your friend and family with their individual rights </li>
			</ul>
		</li>
	</ul>
<a name="author" ></a>
<h3>Author</h3>
<p>
I developped this web based digikam HMI because I don't like to give all my pictures to facebook nor picassa, but to also get help from my friends to manage my photo collection by rating pictures. Moreover, as the administrator of my collection, I can access all my pictures and rate, tag, untag, download them from any browser.
<ul>
	<li>Email : <a href="mailto:mehdilauters@gmail.com">mehdilauters@gmail.com</a> </li>
	<li>Project source : <a href="https://github.com/mehdilauters/digikamWebUi">https://github.com/mehdilauters/digikamWebUi</a>
	<li>Website : <a href="http://lauters.fr"/>lauters.fr</a></li>
	
</ul>
Mehdi
</p>
</div>