class RatingsController < ApplicationController
  before_filter :authorize, :only => [:edit, :update, :destroy]

  def auto_complete_belongs_to_for_rating_tutor_name
    @tutors = Tutor.find(:all, :conditions => ["enabled = 't' AND LOWER(name) LIKE ?", 
                         "%#{params[:tutor][:name]}%"], :limit => 10)
    render :inline => '<%= model_auto_completer_result(@tutors, :name, params[:tutor][:name]) %>'
  end
	
  def auto_complete_belongs_to_for_rating_course_name
    @courses = Course.find(:all, :conditions => ["enabled = 't' AND LOWER(name) LIKE ? OR LOWER(code) LIKE ?",
                           "%#{params[:course][:name]}%", "%#{params[:course][:name]}%"], :limit => 10)
    render :inline => '<%= model_auto_completer_result(@courses, :code_name, params[:course][:name]) %>'
  end

  # GET /ratings
  # GET /ratings.xml
  def index
    @ratings = Rating.paginate_ratings(params[:page])

    respond_to do |format|
      format.html # index.html.erb
      #format.xml  { render :xml => @ratings }
    end
  end

  # GET /top
  # GET /top.xml
  def top
    @ratings = Rating.find(:all, :conditions => ["id in (select id from ratings group by tutor_id order by count(tutor_id) desc limit 10)"],
                           :order => "updated_at DESC", :limit => 10)

    respond_to do |format|
      format.html # top.html.erb
      #format.xml  { render :xml => @ratings }
    end
  end

  # GET /ratings/1
  # GET /ratings/1.xml
  def show
    @rating = Rating.find(params[:id])

    respond_to do |format|
      format.html # show.html.erb
      #format.xml  { render :xml => @rating }
    end
  end

  # GET /ratings/new
  # GET /ratings/new.xml
  def new
    @rating = Rating.new
		@rating.tutor_id = params[:tutor_id]
		@rating.course_id = params[:course_id]

    respond_to do |format|
      format.html # new.html.erb
      #format.xml  { render :xml => @rating }
    end
  end

  # GET /ratings/1/edit
  def edit
    @rating = Rating.find(params[:id])
  end

  # POST /ratings
  # POST /ratings.xml
  def create
    @rating = Rating.new(params[:rating])
			
		@rating.ip = request.remote_ip

    respond_to do |format|
      if @rating.save
        flash[:notice] = I18n.t('long.rating_created')
        format.html { redirect_to :action => 'index' }
        #format.xml  { render :xml => @rating, :status => :created, :location => @rating }
      else
        format.html { render :action => "new" }
        #format.xml  { render :xml => @rating.errors, :status => :unprocessable_entity }
      end
    end
  end

  # PUT /ratings/1
  # PUT /ratings/1.xml
  def update
    @rating = Rating.find(params[:id])

    respond_to do |format|
      if @rating.update_attributes(params[:rating])
        flash[:notice] = 'Rating was successfully updated.'
        format.html { redirect_to(@rating) }
        #format.xml  { head :ok }
      else
        format.html { render :action => "edit" }
        #format.xml  { render :xml => @rating.errors, :status => :unprocessable_entity }
      end
    end
  end

  # DELETE /ratings/1
  # DELETE /ratings/1.xml
  def destroy
    @rating = Rating.find(params[:id])
    @rating.destroy

    respond_to do |format|
      format.html { redirect_to(ratings_url) }
      #format.xml  { head :ok }
    end
  end
end
