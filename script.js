function maskWhatsApp(i) {
    let v = i.value.replace(/\D/g, '');
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");
    i.value = v;
}

// Garante que os campos sejam limpos ao carregar/atualizar a página
window.onload = function() {
    // Limpa o formulário de cadastro
    const meuForm = document.getElementById('meuForm');
    if (meuForm) {
        meuForm.reset();
    }

    // Limpa o campo de busca manualmente
    const campoBusca = document.querySelector('input[name="busca"]');
    if (campoBusca) {
        campoBusca.value = '';
    }
};
