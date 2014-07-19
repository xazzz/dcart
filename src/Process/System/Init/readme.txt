
The Init will be the first process for the system..
It will do :

    App install
    App uninstall

It will check new app, and install it
It will check removed app, and uninstall it

All app information will be saved in database(sqlite)...
So we know which one installed and which one removed...
Also from the table, we will know which command provide what kind of api...

system
    app name
        command
            A
            B
            C
        service
            A
            B
            C

database

    process

        id
        guid
        zone
        name
        description
        version
        author
        date

    command

        id
        process_guid
        guid
        zone
        name
        description
        version
        author
        date
        dependence
        api

    service

        id
        process_guid
        guid
        zone
        name
        description
        version
        author
        date
        dependence
        api