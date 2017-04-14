// importer la class Component
import { Component } from '@angular/core';

// Définir le décorateur @Component ({...})
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Brand New Application';

  collection = ['Pierre', 'Paul', 'Jacques', 'Adrien']

  error = 'pasCool'

  openAlert(){
    alert('Salut')
  }

  sayHelloTo(user){
    console.log('Hello ' + user)
  }

  awesome = 'Hello'

}
