jQuery.validator.addMethod("cnpj", function (cnpj, element) {
    cnpj = jQuery.trim(cnpj);
 
    // DEIXA APENAS OS NÚMEROS
    cnpj = cnpj.replace('/', '');
    cnpj = cnpj.replace('.', '');
    cnpj = cnpj.replace('.', '');
    cnpj = cnpj.replace('-', '');
 
    var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
    digitos_iguais = 1;
 
    if (cnpj.length < 14 && cnpj.length < 15) {
        return this.optional(element) || false;
    }
    for (i = 0; i < cnpj.length - 1; i++) {
        if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {
            digitos_iguais = 0;
            break;
        }
    }
 
    if (!digitos_iguais) {
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0, tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
 
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) {
                pos = 9;
            }
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) {
            return this.optional(element) || false;
        }
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0, tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
            soma += numeros.charAt(tamanho - i) * pos--;
            if (pos < 2) {
                pos = 9;
            }
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)) {
            return this.optional(element) || false;
        }
        return this.optional(element) || true;
    } else {
        return this.optional(element) || false;
    }
}, "Informe um CNPJ válido");

jQuery.validator.addMethod("cpf", function (value, element) {
    value = jQuery.trim(value);
 
    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');
    while (cpf.length < 11) cpf = "0" + cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
    b = 0;
    c = 11;
    for (y = 0; y < 10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return this.optional(element) || false;
    return this.optional(element) || true;
}, "Informe um CPF válido"); // Mensagem padrão 

jQuery.validator.addMethod("dateBR", function (value, element) {
    //contando chars
    if (value == '__/__/____') return true;
    if (value == '') return true;
    if (value.length != 10) return false;
    // verificando data
    var data = value;
    var dia = data.substr(0, 2);
    var barra1 = data.substr(2, 1);
    var mes = data.substr(3, 2);
    var barra2 = data.substr(5, 1);
    var ano = data.substr(6, 4);
    if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return false;
    if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return false;
    if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return false;
    if (ano < 1900) return false;
    return true;
}, "Informe uma data válida");  // Mensagem padrão

jQuery.validator.addMethod("datetimeBR", function (value, element) {
    //contando chars
    if (value.length != 16) return (this.optional(element) || false);
    // dividindo data e hora
    if (value.substr(10, 1) != ' ') return (this.optional(element) || false); // verificando se há espaço
    var arrOpcoes = value.split(' ');
    if (arrOpcoes.length != 2) return (this.optional(element) || false); // verificando a divisão de data e hora
    // verificando data
    var data = arrOpcoes[0];
    var dia = data.substr(0, 2);
    var barra1 = data.substr(2, 1);
    var mes = data.substr(3, 2);
    var barra2 = data.substr(5, 1);
    var ano = data.substr(6, 4);
    if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return (this.optional(element) || false);
    if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return (this.optional(element) || false);
    if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return (this.optional(element) || false);
    // verificando hora
    var horario = arrOpcoes[1];
    var hora = horario.substr(0, 2);
    var doispontos = horario.substr(2, 1);
    var minuto = horario.substr(3, 2);
    if (horario.length != 5 || isNaN(hora) || isNaN(minuto) || hora > 23 || minuto > 59 || doispontos != ":") return (this.optional(element) || false);
    return this.optional(element) || true;
}, "Informe uma data e uma hora válida"); // Mensagem padrão

jQuery.validator.addMethod("notequal", function (value, element, param) {
    return this.optional(element) || (value == $(param).val() ? false : true);
}, "Este valor não pode ser igual"); // Mensagem padrão 

jQuery.validator.addMethod("telefone", function (value, element) {
    value = value.replace("(", "");
    value = value.replace(")", "");
    value = value.replace("-", "");
    return this.optional(element) || /[0-9]{10}/.test(value);
}, "Informe um telefone válido"); // Mensagem padrão

// Celular (com 8 ou 9 dígitos)
jQuery.validator.addMethod("celular", function (value, element) {
    value = value.replace("(", "");
    value = value.replace(")", "");
    value = value.replace("-", "");
    value = value.replace("_", "");
    value = value.replace(" ", "");
    return this.optional(element) || /[0-9]{10}/.test(value) || /[0-9]{11}/.test(value);
}, "Informe um celular válido"); // Mensagem padrão

jQuery.validator.addMethod("cep", function(value, element) {
    return this.optional(element)||/^\d{5}-\d{3}?$/.test(value)
}, "Informe um CEP válido"); // Mensagem padrão    

jQuery.validator.addMethod("trim", function(value, element) {
    return value.length > 0 ? $.trim(value).length > 0 : true;
}, "Por favor, entre com valores diferentes de apenas espaços para o campo.");

jQuery.validator.addMethod("ifDateIsFilledOtherOneIsMandatory", function(value, element, param) {
    var target = $(param);
    if (this.settings.onfocusout) {
        target.unbind(".validate-ifDateIsFilledOtherOneIsMandatory").bind("blur.validate-ifDateIsFilledOtherOneIsMandatory", function() { $(element).valid(); });
    }

    return !(!isDateEmptyOrFilledWithMask(target.val()) && isDateEmptyOrFilledWithMask(value));
}, "Por favor, forneça a outra data deste par final e inicial de datas");

jQuery.validator.addMethod("maximunDifferenceBetweenDates", function(value, element, param) {
    var startDate;
    var endDate;
    if (param[0].contains("Final")) {
        startDate = value;
        endDate = $(param[0]).val();
    } else {
        startDate = $(param[0]).val();
        endDate = value;
    }

    return areBothDatesFilled(startDate, endDate) ? (($.datepicker.parseDate("dd/mm/yy", endDate) - $.datepicker.parseDate("dd/mm/yy", startDate)) / 86400000) <= param[1] : true;
}, $.validator.format("Por favor, forneça uma diferença de no máximo {1} dias entre as datas"));

jQuery.validator.addMethod("requiredComboTree", function(value, element, param) {
    return jQuery.trim(value)!='';
}, "Informe um valor para a ComboTree"); // Mensagem padrão

jQuery.validator.addMethod("validaValorCombo", function(value, element, param) {
    return jQuery.trim(value).length==6;
}, "Informe um valor de ocupação válido para a ComboTree"); // Mensagem padrão

jQuery.validator.addMethod('fileSize', function(value, element, param) {
    // param = size (en bytes) 
    // element = element to validate (<input>)
    // value = value of the element (file name)
    return this.optional(element) || (element.files[0].size <= param) 
});    