import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-studentlist',
  templateUrl: './studentlist.component.html',
  styleUrls: ['./studentlist.component.css']
})
export class StudentlistComponent implements OnInit {
  public studentdetails:any=[{rollno:"1",name:"name 1",batch:"batch 1",department:"department 1"},
  {rollno:"2",name:"name 2",batch:"batch 2",department:"department 2"},
  {rollno:"3",name:"name 3",batch:"batch 3",department:"department 3"}];
  selstudent:any;
  addstudent(data:any){
    this.selstudent=data;
  }
  
  constructor() { }

  ngOnInit() {
  }

}
