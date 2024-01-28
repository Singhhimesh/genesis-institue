<style>
    #particles-js {
        position: absolute;
        width: 100%;
        height: 530px;
        z-index: 6;
    }

    .rgcsm-accordion-style1 .card .card-header {
        padding: 0;
        border: 0;
        margin-bottom: 10px;
        background: transparent;
    }

    .rgcsm-accordion-style1 .card .card-header .acdn-title {
        background-color: rgba(240, 240, 240, 0.8);
        position: relative;
        margin-bottom: 0;
        font-size: 18px;
        height: 50px;
        line-height: 50px;
        padding: 0 20px;
        cursor: pointer;
        font-weight: 500;
        letter-spacing: 0.2px;
        -webkit-transition: 0.2s background-color ease-in-out;
        transition: 0.2s background-color ease-in-out;
    }

    .rgcsm-accordion-style1 .card .card-header .acdn-title:not(.collapsed) {
        background-color: #40b0dd;
        color: #ffffff;
    }

    .rgcsm-accordion-style1 .card .card-header .acdn-title:after {
        position: absolute;
        font-family: FontAwesome;
        content: "\f0da";
        right: 20px;
        transition: all 0.3s ease 0s;
    }

    .rgcsm-accordion-style1 .card .card-header .acdn-title:not(.collapsed):after {
        transform: rotate(90deg);
        color: #ffffff;
    }

    @media only screen and (max-width: 700px) {
        #particles-js {
            position: absolute;
            width: 100%;
            height: 75%;
            z-index: 6;
        }

        .rgcsm-accordion-style1 .card .card-header .acdn-title {
            background-color: rgba(240, 240, 240, 0.8);
            position: relative;
            margin-bottom: 0;
            font-size: 15px;
            height: 50px;
            line-height: 50px;
            padding: 0 20px;
            cursor: pointer;
            font-weight: 500;
            letter-spacing: 0.2px;
            -webkit-transition: 0.2s background-color ease-in-out;
            transition: 0.2s background-color ease-in-out;
        }
    }
</style>