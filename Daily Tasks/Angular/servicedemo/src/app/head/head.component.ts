import { Component, OnInit } from '@angular/core';
import { student } from '../student';
import { NgForm } from '@angular/forms';
import { ServService} from '../serv.service';
@Component({
  selector: 'app-head',
  templateUrl: './head.component.html',
  styleUrls: ['./head.component.css']
})
export class HeadComponent implements OnInit {
student=new student();
isregistered=false;

  constructor( private service: ServService ) {  }

  ngOnInit() {

  }
  registration(f:NgForm){
    this.service.store(this.student).subscribe( data => {
      this.isregistered=true;
      console.log("registered succesfuly");
      f.reset();
    }, (err) => {
      this.isregistered=false;
    });
   }

}
