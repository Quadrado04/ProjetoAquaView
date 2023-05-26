<style>
*{
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
    border: none;
    font-family: Helvetica, sans-serif;
}

a{
    text-decoration: none;
    color: #000000;
    margin: 0;
}

body{
    background-color: #F1FAEE;
}

button:hover{
    color: #ffffff;
    background-color: #E63946;
    cursor: pointer;
    transition: 0.1s;
}

/*   HEADER   */

#header{
    height: 100px;
    background-color: #457B9D;
}

#header #wrap{
    display: flex;
    align-items: center;
    width: 1350px;
    height: fit-content;
}

#header #logo{
    display: flex;
    width: 300px;
    height: 100px;
}

#header #logo #img{
    display: flex;
    width: 250px;
    height: 100px;
}

#header #search{
    display: flex;
    justify-content: center;
    width: 750px;
}

#header #search input{
    margin: 0;
    width: 300px;
    height: 40px;
    padding: 5px;
    border-radius: 20px 0px 0px 20px;
    border-style: hidden;
}

#header button{
    margin: 0;
    width: 100px;
    height: 40px;
    border-radius: 0px 20px 20px 0px;
    border-style: hidden;
    background-color: #1D3557;
    color: #ffffff;
}

#header button:hover{
    color: #ffffff;
    background-color: #E63946;
    cursor: pointer;
    transition: 0.1s;
}

#header #connect{
    display: flex;
    justify-content: center;
    width: 300px;
}

#header #connect #login{
    margin-left: 50px;
    width: 100px;
    height: 40px;
    border-radius: 20px 0px 0px 20px;
    border-style: hidden;
}

#header #connect #adm{
    margin: auto;
    width: 100px;
    height: 40px;
    border-radius: 20px;
    border-style: hidden;
}

#header #connect #signup{
    margin-right: 50px;
    width: 100px;
    height: 40px;
    border-radius: 0px 20px 20px 0px;
    border-style: hidden;
}

#header #profile{
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border-style: hidden;
}

#header #imgUser{
    object-fit:cover;
    object-position: center;
    width: 60px;
    height: 60px;
    max-width: 100%;
    background-color: #eee;
    border-radius: 50%;
}

#header #imgUser:hover{
    cursor: pointer;
    transition: .1s;
}

/*   FOOTER   */

#footer{
    height: 150px;
    background-color: #457B9D;
}

#footer #wrap{
    width: 1350px;
}

#footer #logo{
    display: flex;
    align-items: center;
    width: 300px;
    height: 150px;
}

#footer #logo #img{
    width: 80%;
    height: 80%;
}
</style>