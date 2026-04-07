<!DOCTYPE html>
<html>
<head>
<title>E-Parkir Gen Z</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
font-family:'Poppins',sans-serif;
background:url('background.jpg') no-repeat center center fixed;
background-size:cover;
color:white;
margin:0;
padding:0;
}

/* overlay gelap + blur */
body::before{
content:'';
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.4);
backdrop-filter: blur(3px);
z-index:-1;
}

/* GLASS */
.glass{
background: rgba(255,255,255,0.08);
backdrop-filter: blur(15px);
border-radius:20px;
padding:20px;
margin-bottom:20px;
}

#struk{
background: rgba(255,255,255,0.08);
backdrop-filter: blur(15px);
border-radius:15px;
padding:20px;
color:white;

max-width:900px;   /* INI YANG BIKIN LEBAR */
width:100%;
margin:30px auto;

border:1px solid rgba(255,255,255,0.2);
box-shadow:0 8px 32px rgba(0,0,0,0.2);
}

#struk h6{
font-size:18px;
margin-bottom:15px;
}

#struk p{
font-size:16px;
margin:8px 0;
}

#struk h3{
font-size:26px;
margin:15px 0;
}

#struk .btn{
padding:10px;
font-size:16px;
}

#struk{
max-width:80%;
}

#struk{
max-width:900px !important;
}

/* INPUT */
input,select{
background:rgba(255,255,255,0.1)!important;
border:none!important;
color:white!important;
border-radius:10px!important;
}

/* NAVBAR */
.navbar-modern{
display:flex;
justify-content:space-between;
align-items:center;
padding:15px 30px;
margin:20px;
border-radius:20px;
background: rgba(255,255,255,0.08);
backdrop-filter: blur(20px);
border:1px solid rgba(255,255,255,0.2);
box-shadow:0 8px 32px rgba(0,0,0,0.2);
}

.nav-left h4{
margin:0;
font-weight:600;
}

.nav-right{
display:flex;
align-items:center;
gap:15px;
}

.user-info{
display:flex;
align-items:center;
gap:10px;
}

.avatar{
width:35px;
height:35px;
display:flex;
align-items:center;
justify-content:center;
background:linear-gradient(45deg,#00c6ff,#0072ff);
border-radius:50%;
}

.role{
font-size:14px;
font-weight:500;
}

.status{
font-size:11px;
color:#00ffcc;
}

.btn-logout{
text-decoration:none;
padding:8px 15px;
border-radius:10px;
background:linear-gradient(45deg,#ff416c,#ff4b2b);
color:white;
transition:0.3s;
}

.btn-logout:hover{
transform:scale(1.05);
}

/* TABLE */
.table-modern{
border-spacing:0 10px;
border-collapse:separate;
width:100%;
}

.table-modern tr{
background:rgba(255,255,255,0.08);
}

.table-modern td,.table-modern th{
border:none;
padding:10px;
}
</style>

</head>
<body>