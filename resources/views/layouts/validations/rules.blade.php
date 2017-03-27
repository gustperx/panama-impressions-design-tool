rules: {

    name: {
        required: true,
    },

    first_name: {
        required: true,
        pattern: '^[A-Za-z ]+$',
    },

    last_name: {
        required: true,
        pattern: '^[A-Za-z ]+$',
    },

    dni: {
        required: true,
        pattern: '^[0-9]+$',
    },

    email: {
        required: true,
        email: true,
    },

    password : {
        minlength : 6
    },

    password_confirmation : {
        minlength : 6,
        equalTo : "#password"
    },

    phone_one: {
        required: true,
    },

    phone_two: {
        required: true,
    },

    code: {
        required: true,
    },

    subject: {
        required: true,
    },

    message: {
        required: true,
    },

    title: {
        required: true,
    },

    content: {
        required: true,
    },

    date_end: {
        required: true,
    },

},

messages: {

    first_name: {
        pattern: 'El primer nombre no debe contener valores numericos',
    },

    last_name: {
        pattern: 'El apellido no debe contener valores numericos',
    },

    dni: {
        pattern: 'El campo cédula de identidad no debe contener letras',
    },

    phone_one: {
        pattern: 'El campo numero de contacto principal no debe contener letras ni espacios',
    },

    phone_two: {
        pattern: 'El campo numero de contacto secundario no debe contener letras ni espacios',
    }

}