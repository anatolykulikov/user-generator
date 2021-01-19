export interface ITranslations {
    roleSubscriber: string;
    roleContributor: string;
    roleAuthor: string;
    roleEditor: string;
    userslistTitle: string;
}

export const roleTranslator = (role: string, translations: ITranslations): string => {

    switch(role) {

        case 'subscriber': {
            return translations.roleSubscriber;
        }

        case 'contributor': {
            return translations.roleContributor;
        }

        case 'author': {
            return translations.roleAuthor;
        }

        case 'editor': {
            return translations.roleEditor;
        }

        default: {
            return role;
        }
    }
}