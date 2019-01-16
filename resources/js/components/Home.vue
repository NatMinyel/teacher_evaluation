<template>
<div class="container">
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a href="#">Teacher Evaluation</a></h1>
            </div>
            <div id="menu">
                <ul>
                    <li>
                        <router-link to="/login" class="nav-link">Login</router-link>
                    </li>
                    <li>
                        <router-link to="/register" class="nav-link">Register</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="header-featured"> </div>
    <div id="page-wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>Welcome to our website</h2>
                    <span class="byline">Teacher Evaluation Site</span> </div>
                <p>This is <strong>Teacher Evaluation</strong>, a free, functional teacher evaluation system. </p>
                <router-link to="/dashboard" class="button">Start Here</router-link>
            </div>
        </div>
    </div>
    <div id="copyright" class="container">
        <p>Copyright (c) 2018 teacherevaluation.com. All rights reserved.</p>
    </div>
</div>
</template>

<script>
export default {
    
}
</script>
<style>

@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');
* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}

body, html {
	height: 100%;
	font-family: 'Quicksand', sans-serif;
}

.container
{
	margin: 0px;
	padding: 0px;
	/* background: #33241e; */
	font-size: 11pt;
	font-weight: 300;
	color: #6c6c6c
}



h1, h2, h3
{
	margin: 0;
	padding: 0;
	font-weight: 600;
	color: #454445;
}

p, ol, ul
{
	margin-top: 0;
}

ol, ul
{
	padding: 0;
	list-style: none;
}

p
{
	line-height: 180%;
}

strong
{
}

a
{
	color: #33241e;
}

a:hover
{
	text-decoration: none;
}

.container
{
	margin: 0px auto;
	width: 100%;
}


.image
{
	display: inline-block;
}

.image img
{
	display: block;
	width: 100%;
}

.image-full
{
	display: block;
	width: 100%;
	margin: 0 0 2em 0;
}

.image-left
{
	float: left;
	margin: 0 2em 2em 0;
}

.image-centered
{
	display: block;
	margin: 0 0 2em 0;
}

.image-centered img
{
	margin: 0 auto;
	width: auto;
}

.button
{
	display: inline-block;
	padding: 1.3em 3em;
	background: #704e40;
	border-radius: 30px;	
	letter-spacing: 0.20em;
	text-decoration: none;
	text-transform: uppercase;
	font-weight: 600;
	color: #FFF;
}

.button:hover
{
}

.button:active
{
}

.button-big
{
	padding: 1.6em 4em;
	font-size: 1.4em;
	font-weight: 900;
}

.title
{
	margin-bottom: 3em;
}

.title h2
{
	font-weight: 400;
	font-size: 2.8em;
	color: #33241e;
}

.title .byline
{
	letter-spacing: 0.15em;
	text-transform: uppercase;
	font-weight: 400;
	font-size: 1.1em;
	color: #6F6F6F;
}
	
#header-wrapper
{
	background: #704e40;
}

#header
{
	position: relative;
	height: 100px;
}

#logo
{
	position: absolute;
	top: 2em;
	left: 0;
	width: 100%;
}

#logo h1
{
	display: inline-block;
	font-size: 25px;
	text-transform: uppercase;
	font-weight: 700;
	color: #FFF;
	padding-top: 5px;
	padding-left: 15px;	
}

#logo a
{
	text-decoration: none;
	color: #FFF;
}

#menu
{
	position: absolute;
	right: 0;
    top: 0.7em;
}

#menu ul
{
	display: inline-block;
}

#menu li
{
	display: block;
	float: left;
	text-align: center;
}

#menu li a, #menu li span
{
	display: inline-block;
	margin-left: 0.50em;
	padding: 1em 1.5em;
	letter-spacing: 0.20em;
	text-decoration: none;
	font-size: 0.90em;
	font-weight: 600;
	text-transform: uppercase;
	outline: 0;
	color: #FFF;
}

#menu li:hover a, #menu li.active a, #menu li.active span
{
	background: #33241e;
	color: #FFF;
	border-radius: 25px;
}

#menu .icon
{
}


#page-wrapper
{
	background: #FFF;
}

#page
{
	overflow: hidden;
	padding: 6em 0em;
	border-bottom: 2px solid #E3E3E3;
	text-align: center;
}

#page .button
{
	margin-top: 2em;
}

#content
{
	padding: 0em 7em;
}

#copyright
{
	background:#33241e;
	overflow: hidden;
	padding: 5em 0em;
	border-top: 1px solid rgba(255,255,255,0.08);
}

#copyright p
{
	letter-spacing: 0.20em;
	text-align: center;
	text-transform: uppercase;
	font-size: 0.80em;
	color: rgba(255,255,255,0.3);
}

#copyright a
{
	text-decoration: none;
	color: rgba(255,255,255,0.6);
}


#header-featured
{
	height: 5em;
	background-position: center;
	background-size: cover;
}


#footer .title .byline
{
	display: block;
	padding-top: 1em;
	text-transform: uppercase;
	font-size: 0.80em;
	color: rgba(255,255,255,0.5);
}

#footer .column1,
#footer .column2
{
	width: 560px;
}

#footer .column1
{
	float: left;
}

#footer .column2
{
	float: right;
}

#footer .button
{
	margin-top: 2em;
}
</style>