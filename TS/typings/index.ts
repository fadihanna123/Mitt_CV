export interface Pres {
  id: number;
  fullname: string;
  age: number;
  lang: string;
  title: string;
  mobnr: string;
}

export interface Studie {
  id: number;
  course_name: string;
  studiesschool: string;
  Starttime_studies: string;
  Stoptime_studies: string;
}

export interface Work {
  id: number;
  work_title: string;
  workplace: string;
  Starttime_work: string;
  Stoptime_work: string;
}

export interface Webpages {
  id: number;
  webpage_url: string;
  webpage_title: string;
  webpage_des: string;
}
