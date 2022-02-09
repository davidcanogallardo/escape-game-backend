<<<<<<< HEAD
class Time extends Phaser.Scene {
    constructor() {
        super("time")
    }

    preload() {
        this.segundos = 0;
    }

    create() {
        this.title = this.add.text(5,0, 'Tiempo: ', {
            fontSize: 12,
            fontFamily: 'Georgia, "Goudy Bookletter 1911", Times, serif'
        })

        this.title.setDepth(10)
        //Evento que se ejecturá en bucle cada 1s y actualizará el tiempo
        this.timedEvent = this.time.addEvent({ delay: 1000, callback: this.updateTime, callbackScope: this, loop: true });

        this.scene.get('game').events.on("end", this.end, this);
    }

    update() {
        // 
    }

    end() {
        this.time.removeEvent(this.timedEvent);
        this.scene.get('game').events.emit("tiempo", this.segundos)
    }

    formatTime(seconds){
        // Minutes
        var minutes = Math.floor(seconds/60);
        // Seconds
        var partInSeconds = seconds%60;
        // Adds left zeros to seconds
        partInSeconds = partInSeconds.toString().padStart(2,'0');
        // Returns formated time
        return `${minutes}:${partInSeconds}`;
    }
    
    
    updateTime () {
        this.segundos += 1;
        this.title.setText('Tiempo: ' + this.formatTime(this.segundos));
    }
=======
class Time extends Phaser.Scene {
    constructor() {
        super("time")
    }

    preload() {
        this.segundos = 0;
    }

    create() {
        this.title = this.add.text(5,0, 'Tiempo: ', {
            fontSize: 12,
            fontFamily: 'Georgia, "Goudy Bookletter 1911", Times, serif'
        })

        this.title.setDepth(10)
        //Evento que se ejecturá en bucle cada 1s y actualizará el tiempo
        this.timedEvent = this.time.addEvent({ delay: 1000, callback: this.updateTime, callbackScope: this, loop: true });

    }

    update(){
        
    }

    formatTime(seconds){
        // Minutes
        var minutes = Math.floor(seconds/60);
        // Seconds
        var partInSeconds = seconds%60;
        // Adds left zeros to seconds
        partInSeconds = partInSeconds.toString().padStart(2,'0');
        // Returns formated time
        return `${minutes}:${partInSeconds}`;
    }
    
    
    updateTime () {
        this.segundos += 1;
        this.title.setText('Tiempo: ' + this.formatTime(this.segundos));
    }
>>>>>>> b31f7998c5c4ea4e923bef4b8a72a33380f19ce1
}