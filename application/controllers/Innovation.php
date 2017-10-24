<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Innovation extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('post_model');
    $this->post_model->visitor_count();
    $config['full_tag_open']="<nav><ul class='pagination pagination-sm'>";
    $config['full_tag_close']="</ul></nav>";
    $config['first_link']='First';
    $config['first_tag_open']="<li>";
    $config['first_tag_close']='</li>';
    $config['last_link']='Last';
    $config['last_tag_open']="<li>";
    $config['last_tag_close']='</li>';
    $config['next_link']='>>';
    $config['next_tag_open']="<li>";
    $config['next_tag_close']='</li>';
    $config['prev_link']='<<';
    $config['prev_tag_open']="<li>";
    $config['prev_tag_close']='</li>';
    $config['num_tag_open']="<li>";
    $config['num_tag_close']="</li>";
    $config['cur_tag_open']="<li class='active disable'><a href='#'>";
    $config['cur_tag_close']="</a></li>";
    $this->load->library("pagination",$config);
  }

  function index()
  {
    redirect('innovation/show');
  }

  function show()
  {
    $data['title'] = 'Inovasi';
    $data['subtitle']  = "Inovasi";
    $config['base_url']= site_url('innovation/show');
    $config['total_rows']=$this->post_model->count_list_post();
    $config['per_page'] = $per_page = 9;
    $config['uri_segment']=3;
    $this->pagination->initialize($config);
    $data['paging'] = $this->pagination->create_links();
    $page = ($this->uri->segment(3))?$this->uri->segment(3):0;
    $data['count_post'] = $this->post_model->count_list_post();
    $data['post'] = $this->post_model->get_list_post($per_page,$page);
    $this->template->display('list_innovation',$data);

  }

  function read($slug)
  {
    $data['title'] = "Innovation";
    foreach ($this->post_model->get_data_by_slug($slug) as $row) {
      $data['post_id'] = $row['post_id'];
      $data['post_title'] = $row['title'];
      $data['post_content'] = $row['post_content'];
      $data['post_sts'] = $row['post_sts'];
      $data['youtube_id'] = $row['youtube_id'];
      $data['name'] = $row['name'];
      $data['user_desc'] = $row['user_desc'];
      $data['photo'] = $row['user_photo']==''?'assets/images/user_icon.png':'uploads/user_photo/'.$row['user_photo'];
      $data['post_slug'] = $row['post_slug'];
      $data['post_image'] = $row['post_image'];
      $data['date_create'] = $row['date_create'];
      $data['category_name'] = $row['category_name'];
      $data['user_id'] = $row['user_id'];
      $data['link_website'] = $row['link_website'];
    }
    $data['recent_post'] = $this->post_model->recent_post();
    $data['top_post'] = $this->post_model->top_post();
    $data['viewers'] = $this->post_model->viewers($data['post_id']);
    if ($this->session->userdata('user_lvl') == 1 && $data['post_sts'] == 2) {
          $comment_id = $this->input->get('reply');
          if (isset($comment_id)) {
            foreach ($this->post_model->get_comment_by_id($comment_id) as $row) {
              $data['comment_content'] = $row['comment_content'];
            }
          }
          $data['comment'] = $this->post_model->get_comment($data['post_id']);
          $this->template->display('read_post',$data);
    }else if ($this->session->userdata('user_lvl') == 2 && $data['post_sts'] == 2) {
          $comment_id = $this->input->get('reply');
          if (isset($comment_id)) {
            foreach ($this->post_model->get_comment_by_id($comment_id) as $row) {
              $data['comment_content'] = $row['comment_content'];
            }
          }
          $data['comment'] = $this->post_model->get_comment($data['post_id']);
          $this->template->display('read_post',$data);
    } else if($data['post_sts'] == 1) {
          $comment_id = $this->input->get('reply');
          if (isset($comment_id)) {
            foreach ($this->post_model->get_comment_by_id($comment_id) as $row) {
              $data['comment_content'] = $row['comment_content'];
            }
          }
          $this->post_model->visit_count($data['post_id']);
          $data['comment'] = $this->post_model->get_comment($data['post_id']);
          $this->template->display('read_post',$data);
    }else {
      redirect('home');
    }

  }

  function category($category_slug)
  {
    $data['title'] = 'Inovasi';
    $data['subtitle']  = "Inovasi";
    $config['base_url']= site_url('innovation/category/'.$category_slug);
    $config['total_rows']=$this->post_model->count_list_post_category($category_slug);
    $config['per_page'] = $per_page = 9;
    $config['uri_segment']=4;
    $this->pagination->initialize($config);
    $data['paging'] = $this->pagination->create_links();
    $page = ($this->uri->segment(4))?$this->uri->segment(4):0;
    $data['count_post'] = $this->post_model->count_list_post_category($category_slug);
    $data['post'] = $this->post_model->get_list_post_category($category_slug,$per_page,$page);
    $this->template->display('category_innovation',$data);

  }

  function post()
  {
    if ($this->session->has_userdata('user_id')) {
      $data['title'] = "Innovation";
      $data['subtitle'] = "Share Inovasi";
      $data['category'] = $this->post_model->get_category();
      $this->template->display('post',$data);
    } else {
      redirect('login');
    }

  }

  function do_post()
  {
      $data['title'] = "Innovation";
      $data['subtitle'] = "Share Inovasi";
      $data['category'] = $this->post_model->get_category();
      $this->form_validation->set_rules('category','Kategori','required');
      $this->form_validation->set_rules('post_title','Judul Kategori','required');
      $this->form_validation->set_rules('post_content','Deskripsi','required');
      $this->form_validation->set_rules('link_website','Link Website','prep_url');
      $this->form_validation->set_rules('gambar','Gambar','callback_validasi_upload_insert');
      if ($this->form_validation->run() == false) {
        $this->template->display('post',$data);
      } else {
        redirect('profile/inovasi');
      }
  }

  function edit($id)
  {
    $data['title'] = "Innovation";
    $data['subtitle'] = "Share Inovasi";
    $data['category'] = $this->post_model->get_category();
    foreach ($this->post_model->get_data_post($id) as $row) {
      $data['category_id'] = $row['category_id'];
      $data['post_title'] = $row['title'];
      $data['post_content'] = $row['post_content'];
      $data['youtube_id'] = $row['youtube_id'];
      $data['post_image'] = $row['post_image'];
      $data['link_website'] = $row['link_website'];
    }
    $this->template->display('edit_post',$data);
  }

  function update()
  {
    $data['title'] = "Innovation";
    $data['subtitle'] = "Share Inovasi";
    $data['category'] = $this->post_model->get_category();
    $this->form_validation->set_rules('category','Kategori','required');
    $this->form_validation->set_rules('post_title','Judul Kategori','required');
    $this->form_validation->set_rules('post_content','Deskripsi','required');
    $this->form_validation->set_rules('link_website','Link Website','prep_url');
    $this->form_validation->set_rules('gambar','Gambar','callback_validasi_upload_update');
    if ($this->form_validation->run() == false) {
      $this->template->display('edit_post',$data);
    } else {
      redirect('profile/inovasi');
    }
  }

  function validasi_upload_insert()
  {
    $category_id = $this->input->post('category');
    $title = $this->input->post('post_title');
    $content = $this->input->post('post_content');
    $youtube_id = $this->input->post('youtube_id');
    $link_website = $this->input->post('link_website');
    $pecah = explode(" ",trim($title));
    $slug = $this->nyieun_slug(strtolower(implode("-",$pecah)));

    $config['upload_path']          = './uploads/post_image';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['encrypt_name']         = true;
    $config['max_size']             = 1024;
    $config['max_width']            = 1500;
    $config['max_height']           = 1200;
    $this->load->library('upload', $config);
    if (!empty($_FILES['gambar']['name'])) {

      if ( ! $this->upload->do_upload('gambar'))
      {
            $this->form_validation->set_message('validasi_upload_insert',$this->upload->display_errors('',''));
            return false;
      }
      else
      {
          $input = [
            'category_id'   => $category_id,
            'post_title'    => $this->anti_injection($title),
            'post_slug'     => $slug,
            'user_id'       => $this->session->userdata('user_id'),
            'title'         => $this->anti_injection($title),
            'post_content'  => $content,
            'youtube_id'   => $youtube_id,
            'link_website'  => $link_website,
            'post_image'    => $this->upload->data()['file_name'],
            'post_sts'      => 2,
          ];
          $this->post_model->save($input);
        return true;
      }

    } else {
      $input = [
        'category_id'   => $category_id,
        'post_title'    => $this->anti_injection($title),
        'user_id'       => $this->session->userdata('user_id'),
        'post_slug'     => $slug,
        'title'         => $this->anti_injection($title),
        'post_content'  => $content,
        'youtube_id'   => $youtube_id,
        'link_website'  => $link_website,
        'post_sts'      => 2,
      ];
      $this->post_model->save($input);
    return true;
    }

  }

  function validasi_upload_update()
  {
    $category_id = $this->input->post('category');
    $title = $this->input->post('post_title');
    $content = $this->input->post('post_content');
    $youtube_id = $this->input->post('youtube_id');
    $link_website = $this->input->post('link_website');
    $config['upload_path']          = './uploads/post_image';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['encrypt_name']         = true;
    $config['max_size']             = 1024;
    $config['max_width']            = 1500;
    $config['max_height']           = 1200;
    $this->load->library('upload', $config);
    if (!empty($_FILES['gambar']['name'])) {
      if ( ! $this->upload->do_upload('gambar'))
      {
            $this->form_validation->set_message('validasi_upload_update',$this->upload->display_errors('',''));
            return false;
      }
      else
      {
        $post_id = $this->input->post('post_id');
        $input = [
          'category_id'   => $category_id,
          'title'         => $this->anti_injection($title),
          'post_content'  => $content,
          'youtube_id'    => $youtube_id,
          'link_website'  => $link_website,
          'post_image'    => $this->upload->data()['file_name'],
          'post_sts'      => 2,
        ];
        $this->post_model->update($post_id,$input);
        return true;
      }
    } else {
      $post_id = $this->input->post('post_id');
      $input = [
        'category_id'   => $category_id,
        'title'         => $this->anti_injection($title),
        'post_content'  => $content,
        'youtube_id'   => $youtube_id,
        'link_website'  => $link_website,
        'post_sts'      => 2,
      ];
      $this->post_model->update($post_id,$input);
      return true;
    }

  }


  function comment(){
    $comment = [
      'post_id' => $this->input->post('post_id'),
      'anonymos' => $this->input->post('anonymos_name'),
      'quote_id' => $this->input->post('quote_id'),
      'user_id' => $this->session->userdata('user_id'),
      'comment_content' => $this->input->post('comment_content'),
    ];
    $this->post_model->save_comment($comment);
    redirect('innovation/read/'.$this->input->post('post_slug'));
  }

  function upload_from_ck()
  {
    $config['upload_path']          = './uploads/post_content';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['encrypt_name']         = true;
    $config['max_size']             = 1024;
    $config['max_width']            = 1024;
    $config['max_height']           = 780;
    $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('upload'))
             {
                     echo $this->upload->display_errors();
             }
             else
             {
               $dataImage = $this->upload->data();
               $funcNum = $this->input->get('CKEditorFuncNum');
               $url = base_url().'/uploads/post_content/'.$dataImage['file_name'];
               $message = '.....';
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
             }
  }

  function delete($id)
  {
    $this->post_model->delete_post($id);
    redirect('profile/inovasi');
  }

  function anti_injection($kata){
      $q = stripcslashes(strip_tags(htmlspecialchars($kata, ENT_QUOTES)));
      return $q;
  }

  function nyieun_slug($str, $options = array()) {
	// Make sure string is in UTF-8 and strip invalid UTF-8 characters
	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => false,
	);

	// Merge options
	$options = array_merge($defaults, $options);

	$char_map = array(
		// Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
		'ß' => 'ss',
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
		'ÿ' => 'y',
		// Latin symbols
		'©' => '(c)',
		// Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
		// Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
		// Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',
		// Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
		// Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
		'Ž' => 'Z',
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z',
		// Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
		'Ż' => 'Z',
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',
		// Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);

	// Make custom replacements
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

	// Transliterate characters to ASCII
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}

	// Replace non-alphanumeric characters with our delimiter
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

	// Remove duplicate delimiters
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

	// Truncate slug to max. characters
	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

	// Remove delimiter from ends
	$str = trim($str, $options['delimiter']);

	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

}
