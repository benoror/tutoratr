# Filters added to this controller apply to all controllers in the application.
# Likewise, all the methods added will be available for all controllers.

class ApplicationController < ActionController::Base
  helper :all # include all helpers, all the time

  helper_method :admin?

  before_filter :set_locale

  rescue_from ActionController::RoutingError, :with => :not_found
  rescue_from ActiveRecord::RecordNotFound, :with => :not_found
  rescue_from ActionController::UnknownController, :with => :not_found
  rescue_from ActionController::UnknownAction, :with => :not_found

  def auto_complete_for_tutor_name
    query = params[:tutor][:name]

    @tutors = Tutor.find(:all, :select => "'t' AS type, id, name",
      :conditions => ["enabled = 't' AND LOWER(name) LIKE ?", "%#{query}%"], :limit => 10)

    @courses = Course.find(:all, :select => "'c' AS type, id, ('['||code||'] '||name) AS name",
      :conditions => ["enabled = 't' AND LOWER(name) LIKE ? OR LOWER(code) LIKE ?", "%#{query}%", "%#{query}%"], :limit => 10)

    #render :inline => "<%= auto_complete_result @tutors+@courses, 'name', params[:tutor][:name] %>"
    render :partial => 'application/auto_complete_result'
  end

protected

  def authorize
    session[:logged_in] = authenticate_or_request_with_http_basic do |username,password|
      username == "admin" && Digest::MD5.hexdigest(password.to_s) == "5353a8198a048980d797e0e7337b339b"
    end

    unless session[:logged_in]
      #flash[:notice] = "unauthorized access!"
      redirect_to :action => 'index'
      false
    end
  end

  def admin?
    session[:logged_in] == true
  end

  def set_locale
    session[:locale] = params[:locale] if params[:locale]
    I18n.locale = session[:locale] || I18n.default_locale

    locale_path = "#{LOCALES_DIRECTORY}#{I18n.locale}.yml"

    unless I18n.load_path.include? locale_path
      I18n.load_path << locale_path
      I18n.backend.send(:init_translations)
    end
  rescue Exception => err
    logger.error err
    flash.now[:notice] = "#{I18n.locale} translation not available"

    I18n.load_path -= [locale_path]
    I18n.locale = session[:locale] = I18n.default_locale
  end

private

  def not_found(e)
    flash[:notice] = "What the fuck are you looking for?<br /><br />#{e.message}"
    redirect_to :controller => 'ratings'
  end

end
