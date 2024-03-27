import * as Yup from "yup";

export const EMAIL_REQUIRED = "Email is required.";
export const EMAIL_FORMAT = "Invalid email.";
export const EMAIL_TYPE = "Email must contain only alphabets characters.";
export const NAME_REQUIRED = "Name is required.";
export const NAME_TYPE = "Name must contain only alphabets characters.";
export const PASSWORD_TYPE = "Password must be at string format.";
export const PASSWORD_REQUIRED = "Password is required.";
export const PASSWORD_MIN = "The password must contain a min of 7 characters.";
export const PASSWORD_MAX = "The password must contain a max of 14 characters.";
export const PASSWORD_CONFIRM_REQUIRED = "Please confirm your password";
export const PASSWORD_MATCH = "The passwords do not match.";
export const TITLE_REQUIRED = "Title is required.";
export const DESCRIPTION_REQUIRED = "Description is required.";
export const ROLE_REQUIRED = "Role is required.";
export const ASSIGNED_TO_REQUIRED = "Assigned to is required.";
export const STATUS_REQUIRED = "Status is required.";


export const initialContactFormValues = {
    name: "",
    email: "",
    title: "",
    role: "",
    assignedTo: "",
    status: "",
};

export const initialValues = {
    name: "",
    email: "",
    password: "",
    confirmPassword: "",
    title: "",
    role: "",
    assignedTo: "",
    status: "",
}

export const valuesSchema = {
    name: Yup
        .string(NAME_TYPE)
        .required(NAME_REQUIRED),
    email: Yup
        .string(EMAIL_TYPE)
        .email(EMAIL_FORMAT)
        .required(EMAIL_REQUIRED),
    password: Yup
        .string(PASSWORD_TYPE)
        .required(PASSWORD_REQUIRED)
        .min(7, PASSWORD_MIN)
        .max(14, PASSWORD_MAX),
    confirmPassword: Yup
        .string()
        .required(PASSWORD_CONFIRM_REQUIRED)
        .min(7, PASSWORD_MIN)
        .max(14, PASSWORD_MAX)
        .oneOf([Yup.ref('password'), null], PASSWORD_MATCH),
    title: Yup
        .string()
        .required(TITLE_REQUIRED),
    role: Yup
        .string()
        .required(ROLE_REQUIRED),
    title: Yup
        .string()
        .required(TITLE_REQUIRED),
    description: Yup
        .string()
        .required(DESCRIPTION_REQUIRED),
    assignedTo: Yup
        .string()
        .required(ASSIGNED_TO_REQUIRED),
    status: Yup
        .string()
        .required(STATUS_REQUIRED),
}

export const formSchema = (valuesSchema) => {
    return Yup.object().shape(valuesSchema);
}