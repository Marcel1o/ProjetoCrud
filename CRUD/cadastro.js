const usuario = document.getElementById("login")
const senha = document.getElementById("senha")

form.addEventListener("submit", (event) =>{
    event.preventDefault();

    //Verifica se os campos estão vazioss
    if(usuario.value === ""){
        alert("Por favor, digite seu usuario");
    return;
    }
    if(senha.value === "") {
        alert("Por favor, digite sua senha");
    return;
    }
    if(senha.value.length < 8) {
        alert("a senha deve ter no minimo 8 caracteres")
    return
    }
    location.href = "../CRUD/lista.php";


});

