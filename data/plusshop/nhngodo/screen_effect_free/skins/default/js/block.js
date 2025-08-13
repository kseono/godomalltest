var BlockDefault = {
    run: function (config) {
        config = this.castType(config);

        if (!this.validDate(config)) {
            return false;
        }

        if (config.effectType === 3) {
            this.popcorn(config);
        } else {
            this.snow(config);
        }
    },
    castType: function (config) {
        config.effectType = Number(config.effectType);
        config.effectSpeed = Number(config.effectSpeed);
        config.effectAmount = Number(config.effectAmount);
        config.effectLimited = Number(config.effectLimited);

        return config;
    },
    validDate: function (config) {
        if (config.effectLimited === 1) {
            var startDate = moment(config.effectStartDate + ' ' + config.effectStartTime);
            var endDate = moment(config.effectEndDate + ' ' + config.effectEndTime);
            var now = moment();

            if (startDate > now || endDate < now) {
                return false;
            }
        }

        return true;
    },
    getSpeed: function (config) {
        var type = Number(config.effectType);
        var speed = Number(config.effectSpeed);

        var snow = [1, 2, 3, 4, 5];
        var popcorn = [60, 50, 40, 30, 10];
        var setSpeed;

        if (type === 3) {
            setSpeed = popcorn[speed - 1];
        } else {
            setSpeed = snow[speed - 1];
        }

        return setSpeed;
    },
    getAmount: function (config) {
        var amount = [8, 14, 20, 40, 60];
        var width = document.body.clientWidth;
        var magnification = width / 1378;

        return Math.ceil(amount[config.effectAmount - 1] * magnification);
    },
    getSize: function (config) {
        var min, max;

        switch (config.effectImage) {
            case 'money_2.png':
                min = 30;
                max = 80;
                break;
            default:
                min = 5;
                max = 40;
        }

        return {min: min, max: max};
    },
    snow: function (config) {
        var effect = new SnowFall($(document.body));
        var speed = this.getSpeed(config);
        var size = this.getSize(config);

        effect.setImage(config.commonImages + '/' + config.effectImage);
        effect.setMaxSpeed(speed);
        effect.setMinSpeed(speed);
        effect.setFlakeCount(this.getAmount(config));
        effect.setMinSize(size.min);
        effect.setMaxSize(size.max);
        effect.setOpacity(config.effectOpacity / 100);
        if (config.effectTypeTwinkle) {
            effect.setTwinkle();
        }
        if (config.effectType === 1) {
            effect.setStraight();
        } else if (config.effectType === 2) {
            effect.setMoving();
        }
    },
    popcorn: function (config) {
        var effect = new PopCornWrapper($(document.body));
        var speed = this.getSpeed(config);
        var size = this.getSize(config);

        effect.setImage(config.commonImages + '/' + config.effectImage);
        effect.setSpeed(speed);
        effect.setFlakeCount(this.getAmount(config));
        effect.setMinSize(size.min);
        effect.setMaxSize(size.max);
    }
};
