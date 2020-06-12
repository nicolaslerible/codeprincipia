class Typhon extends Enemy {
    constructor(config) {
        super(config);

        this.lives = 4;
        this.canTouch = true;
        this.moveSet = config.movement;
        this.posX = config.x;
        this.odd = config.odd;

        //Animación        
        this.play("anim-typhon");
        this.body.setSize(32, 32);
        this.setScale(2);

        this.loop1 = true;

    }

    moveShip() {
        if (this.y > 600) {
            this.loop1 = false;
            this.resetShipPos(this.posX, -32);
        }

        if (this.loop1) {
            this.body.velocity.y = 500;

        } else {
            if (this.y > 100) {
                this.body.velocity.y = 50;
                if (parseInt(this.y) % 20 == 0 && this.y < 256){
                    this.shoot();
                }
                
            } else {
                this.body.velocity.y = 500;
                
            }
        }

    }
}