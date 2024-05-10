import {client,account} from appwrite;

const client = new client()
                   .setEndpoint("https://cloud.appwrite.io/console/project-663e14940011f4f2d8c1/overview/platforms")
                   .setProject("663e14940011f4f2d8c1");
const account = new account(client);


export {client,account} from appwrite;